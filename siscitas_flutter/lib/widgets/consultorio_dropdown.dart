import 'package:flutter/material.dart';
import 'package:siscitas_flutter/models/consultorio.dart';

class ConsultorioDropdown extends StatelessWidget {
  final List<Consultorio> consultorios;
  final Function(int?) onChanged;

  const ConsultorioDropdown({
    super.key,
    required this.consultorios,
    required this.onChanged,
  });

  @override
  Widget build(BuildContext context) {
    return DropdownButtonFormField<int>(
      decoration: InputDecoration(
        border: const OutlineInputBorder(),
        contentPadding: const EdgeInsets.symmetric(horizontal: 12, vertical: 8),
        filled: true,
        fillColor: Colors.white,
      ),
      hint: const Text('Seleccione un consultorio...'),
      items: consultorios.map((consultorio) {
        return DropdownMenuItem<int>(
          value: consultorio.id,
          child: Text(
            '${consultorio.nombre} - ${consultorio.ubicacion}',
            overflow: TextOverflow.ellipsis,
          ),
        );
      }).toList(),
      onChanged: onChanged,
      validator: (value) {
        if (value == null) {
          return 'Por favor seleccione un consultorio';
        }
        return null;
      },
    );
  }
}
