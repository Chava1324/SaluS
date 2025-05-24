import 'package:flutter/foundation.dart';
import 'package:siscitas_flutter/api/api_client.dart';
import 'package:siscitas_flutter/models/consultorio.dart';
import 'package:siscitas_flutter/models/horario.dart';

class ConsultorioProvider with ChangeNotifier {
  final ApiClient _apiClient = ApiClient();

  List<Consultorio> _consultorios = [];
  List<Horario> _horarios = [];
  int? _selectedConsultorio;
  bool _isLoading = false;

  List<Consultorio> get consultorios => _consultorios;
  List<Horario> get horarios => _horarios;
  int? get selectedConsultorio => _selectedConsultorio;
  bool get isLoading => _isLoading;

  Future<void> fetchConsultorios() async {
    _isLoading = true;
    notifyListeners();

    try {
      final response = await _apiClient.get('consultorios');
      _consultorios = (response['data'] as List)
          .map((json) => Consultorio.fromJson(json))
          .toList();
      _isLoading = false;
      notifyListeners();
    } catch (e) {
      _isLoading = false;
      notifyListeners();
      rethrow;
    }
  }

  Future<void> fetchHorariosConsultorio(int consultorioId) async {
    _selectedConsultorio = consultorioId;
    _isLoading = true;
    notifyListeners();

    try {
      final response = await _apiClient.get(
        'horarios/consultorios/$consultorioId');
      _horarios = (response['data'] as List)
          .map((json) => Horario.fromJson(json))
          .toList();
      _isLoading = false;
      notifyListeners();
    } catch (e) {
      _isLoading = false;
      notifyListeners();
      rethrow;
    }
  }
}
