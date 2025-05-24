import 'package:flutter/material.dart';
import 'package:siscitas_flutter/screens/usuarios/reservas_screen.dart'; // ✅ Importa la correcta

class UsuariosScreen extends StatelessWidget {
  const UsuariosScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Sistema de Citas'),
        actions: [
          IconButton(
            icon: const Icon(Icons.logout),
            onPressed: () {
              Navigator.pushReplacementNamed(context, '/login');
            },
          ),
        ],
      ),
      body: SingleChildScrollView(
        padding: const EdgeInsets.all(16),
        child: const Column(
          children: [
            SizedBox(height: 20),
            ReservasScreen(), 
          ],
        ),
      ),
    );
  }
}
