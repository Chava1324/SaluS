import 'dart:convert';
import 'package:http/http.dart' as http;
import 'package:siscitas_flutter/services/storage_service.dart';
import 'package:siscitas_flutter/utils/constants.dart';

class ApiClient {
  final StorageService _storageService = StorageService();
  final http.Client _client = http.Client();

  Future<Map<String, dynamic>> get(String endpoint) async {
    final token = await _storageService.getToken();
    final response = await _client.get(
      Uri.parse('${ApiConstants.baseUrl}/$endpoint'),
      headers: {
        'Authorization': 'Bearer $token',
        'Accept': 'application/json',
      },
    );
    return jsonDecode(response.body);
  }

  Future<Map<String, dynamic>> post(String endpoint, Map<String, dynamic> body) async {
    final token = await _storageService.getToken();
    final response = await _client.post(
      Uri.parse('${ApiConstants.baseUrl}/$endpoint'),
      headers: {
        'Authorization': 'Bearer $token',
        'Content-Type': 'application/json',
        'Accept': 'application/json',
      },
      body: jsonEncode(body),
    );
    return jsonDecode(response.body);
  }
}
