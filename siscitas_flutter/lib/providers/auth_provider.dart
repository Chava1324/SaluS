// auth_provider.dart

import 'package:flutter/material.dart';
import 'package:siscitas_flutter/services/auth_service.dart';
import 'package:siscitas_flutter/services/storage_service.dart';

class User {
  final int id;
  final String name;
  final String email;

  User({
    required this.id,
    required this.name,
    required this.email,
  });

  factory User.fromJson(Map<String, dynamic> json) {
    return User(
      id: json['id'],
      name: json['name'] ?? '',
      email: json['email'] ?? '',
    );
  }

  Map<String, dynamic> toJson() {
    return {
      'id': id,
      'name': name,
      'email': email,
    };
  }
}

class AuthProvider extends ChangeNotifier {
  final AuthService _authService = AuthService();
  final StorageService _storageService = StorageService();

  User? _user;
  bool isLoading = false;
  String? errorMessage;

  User? get user => _user;

  Future<bool> login(String email, String password) async {
    isLoading = true;
    errorMessage = null;
    notifyListeners();

    try {
      final response = await _authService.login(email, password);

      final token = response['token'];
      final userData = response['user'];

      if (token != null && userData != null) {
        await _storageService.saveToken(token);

        // 🟢 NUEVO: guardar ID del usuario
        await _storageService.saveUserId(userData['id'].toString());

        _user = User.fromJson(userData);

        isLoading = false;
        notifyListeners();
        return true;
      } else {
        errorMessage = 'Token o datos de usuario inválidos';
        isLoading = false;
        notifyListeners();
        return false;
      }
    } catch (e) {
      errorMessage = 'Credenciales incorrectas';
      isLoading = false;
      notifyListeners();
      return false;
    }
  }

  Future<void> logout() async {
    await _storageService.deleteToken();
    await _storageService.deleteUserId();
    _user = null;
    notifyListeners();
  }
}
