import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:siscitas_flutter/models/calendar_event.dart';
import 'package:siscitas_flutter/providers/consultorio_provider.dart';
import 'package:siscitas_flutter/widgets/calendar_widget.dart';
import 'package:siscitas_flutter/widgets/consultorio_dropdown.dart';

class HorariosScreen extends StatefulWidget {
  const HorariosScreen({super.key});

  @override
  State<HorariosScreen> createState() => _HorariosScreenState();
}

class _HorariosScreenState extends State<HorariosScreen> {
  @override
  void initState() {
    super.initState();
    Future.microtask(() =>
      Provider.of<ConsultorioProvider>(context, listen: false).fetchConsultorios());
  }

  @override
  Widget build(BuildContext context) {
    final consultorioProvider = Provider.of<ConsultorioProvider>(context);

    return SizedBox(
      height: MediaQuery.of(context).size.height * 0.6, // Altura controlada
      child: Card(
        elevation: 4,
        shape: RoundedRectangleBorder(
          borderRadius: BorderRadius.circular(12),
        ),
        child: Padding(
          padding: const EdgeInsets.all(16),
          child: Column(
            children: [
              // Encabezado
              Row(
                children: [
                  const Icon(Icons.calendar_today, color: Colors.blue),
                  const SizedBox(width: 12),
                  const Text(
                    'Horarios de Consultorios',
                    style: TextStyle(
                      fontSize: 18,
                      fontWeight: FontWeight.bold,
                    ),
                  ),
                  const Spacer(),
                  SizedBox(
                    width: 300,
                    child: ConsultorioDropdown(
                      consultorios: consultorioProvider.consultorios,
                      onChanged: (value) {
                        if (value != null) {
                          consultorioProvider.fetchHorariosConsultorio(value);
                        }
                      },
                    ),
                  ),
                ],
              ),
              const SizedBox(height: 20),
              // Contenido
              Expanded(
                child: consultorioProvider.selectedConsultorio == null
                    ? const Center(child: Text('Seleccione un consultorio'))
                    : consultorioProvider.isLoading
                        ? const Center(child: CircularProgressIndicator())
                        : CalendarWidget(
                            events: consultorioProvider.horarios.map((h) {
                              return CalendarEvent(
                                title: 'Disponible',
                                startTime: h.horaInicio,
                                endTime: h.horaFin,
                                color: Colors.green,
                              );
                            }).toList(),
                          ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
