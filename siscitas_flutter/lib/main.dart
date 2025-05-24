import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:siscitas_flutter/providers/auth_provider.dart';
import 'package:siscitas_flutter/providers/consultorio_provider.dart';
import 'package:siscitas_flutter/providers/reserva_provider.dart';
import 'package:siscitas_flutter/screens/auth/login_screen.dart';

void main() {
  WidgetsFlutterBinding.ensureInitialized(); // 👈 importante para web
  runApp(
    MultiProvider(
      providers: [
        ChangeNotifierProvider(create: (_) => AuthProvider()),
        ChangeNotifierProvider(create: (_) => ConsultorioProvider()),
        ChangeNotifierProvider(create: (_) => DoctorProvider()),
        ChangeNotifierProvider(create: (_) => CitaProvider()),
        ChangeNotifierProvider(create: (_) => ReservaProvider()),
      ],
      child: const MyApp(),
    ),
  );
}

class DoctorProvider extends ChangeNotifier {}
class CitaProvider extends ChangeNotifier {}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Siscitas App',
      theme: ThemeData(
        primarySwatch: Colors.blue,
        inputDecorationTheme: const InputDecorationTheme(
          border: OutlineInputBorder(),
          contentPadding: EdgeInsets.symmetric(horizontal: 12, vertical: 14),
        ),
      ),
      home: const LoginScreen(),
      debugShowCheckedModeBanner: false,
    );
  }
}
