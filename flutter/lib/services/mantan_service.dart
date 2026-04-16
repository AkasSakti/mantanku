import 'dart:convert';

import 'package:flutter/foundation.dart';
import 'package:http/http.dart' as http;

import '../models/mantan.dart';

class MantanService {
  MantanService({http.Client? client}) : _client = client ?? http.Client();

  final http.Client _client;

  static String get baseUrl {
    if (kIsWeb) {
      return 'http://127.0.0.1:8000/api/mantan';
    }

    return 'http://10.0.2.2:8000/api/mantan';
  }

  Future<List<Mantan>> getMantan() async {
    final response = await _client.get(Uri.parse(baseUrl));
    _ensureSuccess(response);

    final body = jsonDecode(response.body) as Map<String, dynamic>;
    final data = (body['data'] as List<dynamic>? ?? [])
        .map((item) => Mantan.fromJson(item as Map<String, dynamic>))
        .toList();

    return data;
  }

  Future<Mantan> createMantan(Mantan mantan) async {
    final response = await _client.post(
      Uri.parse(baseUrl),
      headers: _headers,
      body: jsonEncode(mantan.toJson()),
    );
    _ensureSuccess(response, expectedStatus: 201);

    final body = jsonDecode(response.body) as Map<String, dynamic>;
    return Mantan.fromJson(body['data'] as Map<String, dynamic>);
  }

  Future<Mantan> updateMantan(Mantan mantan) async {
    final response = await _client.put(
      Uri.parse('$baseUrl/${mantan.idMantan}'),
      headers: _headers,
      body: jsonEncode(mantan.toJson()),
    );
    _ensureSuccess(response);

    final body = jsonDecode(response.body) as Map<String, dynamic>;
    return Mantan.fromJson(body['data'] as Map<String, dynamic>);
  }

  Future<void> deleteMantan(int id) async {
    final response = await _client.delete(Uri.parse('$baseUrl/$id'));
    _ensureSuccess(response);
  }

  void _ensureSuccess(http.Response response, {int expectedStatus = 200}) {
    if (response.statusCode != expectedStatus) {
      throw Exception('Request gagal (${response.statusCode}): ${response.body}');
    }
  }

  Map<String, String> get _headers => const {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
      };
}
