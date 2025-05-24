import 'dart:convert';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import '../models/reserva.dart';
import '../services/storage_service.dart';

class ReservaProvider with ChangeNotifier {
  final StorageService _storageService = StorageService();

  List<Reserva> _reservas = [];
  bool _isLoading = false;

  List<Reserva> get reservas => _reservas;
  bool get isLoading => _isLoading;

  Future<void> fetchReservasPaciente() async {
    _isLoading = true;
    notifyListeners();

    try {
      final userId = await _storageService.getUserId();
      if (userId == null) {
        print('No se encontró el ID del usuario.');
        _isLoading = false;
        return;
      }

      final url = Uri.parse('http://127.0.0.1:8000/api/reservas/$userId');
      final response = await http.get(url);

      if (response.statusCode == 200) {
        final List<dynamic> data = json.decode(response.body);
        _reservas = data.map((json) => Reserva.fromJson(json)).toList();
      } else {
        print('Error en respuesta del servidor: ${response.statusCode}');
        _reservas = [];
      }
    } catch (e) {
      print('Error cargando reservas: $e');
      _reservas = [];
    }

    _isLoading = false;
    notifyListeners();
  }
}
