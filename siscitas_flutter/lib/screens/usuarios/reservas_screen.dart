import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:siscitas_flutter/providers/reserva_provider.dart';
import 'package:intl/intl.dart';
import 'package:intl/date_symbol_data_local.dart';

class ReservasScreen extends StatefulWidget {
  const ReservasScreen({super.key});

  @override
  State<ReservasScreen> createState() => _ReservasScreenState();
}

class _ReservasScreenState extends State<ReservasScreen> {
  @override
  void initState() {
    super.initState();
    Future.microtask(() {
      final reservaProvider =
          Provider.of<ReservaProvider>(context, listen: false);
      reservaProvider.fetchReservasPaciente();
    });
  }

  String formatearFecha(DateTime fecha) {
    initializeDateFormatting('es', null);
    final DateFormat formatter = DateFormat('d \'de\' MMMM \'de\' y', 'es');
    return formatter.format(fecha);
  }

  String formatearHora(DateTime hora) {
    final DateFormat formatter = DateFormat('HH:mm');
    return formatter.format(hora);
  }

  @override
  Widget build(BuildContext context) {
    final reservaProvider = Provider.of<ReservaProvider>(context);
    final theme = Theme.of(context);

    return SingleChildScrollView(
      child: Center(
        child: Container(
          constraints: const BoxConstraints(maxWidth: 600),
          padding: const EdgeInsets.all(16),
          child: Card(
            elevation: 4,
            shape: RoundedRectangleBorder(
              borderRadius: BorderRadius.circular(16),
            ),
            shadowColor: Colors.deepPurple.withOpacity(0.3),
            color: const Color.fromARGB(255, 255, 255, 255),
            child: Padding(
              padding: const EdgeInsets.all(20),
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  Row(
                    children: [
                      Container(
                        padding: const EdgeInsets.all(8),
                        decoration: BoxDecoration(
                          color: Colors.deepPurple.withOpacity(0.1),
                          shape: BoxShape.circle,
                        ),
                        child: Icon(
                          Icons.calendar_today,
                          color: Colors.deepPurple[800],
                          size: 24,
                        ),
                      ),
                      const SizedBox(width: 12),
                      Text(
                        'Mis Reservas',
                        style: theme.textTheme.titleLarge?.copyWith(
                          fontWeight: FontWeight.bold,
                          color: Colors.deepPurple[800],
                        ),
                      ),
                    ],
                  ),
                  const SizedBox(height: 20),
                  reservaProvider.isLoading
                      ? const Center(
                          child: CircularProgressIndicator(
                            valueColor: AlwaysStoppedAnimation<Color>(
                                Colors.deepPurple),
                          ),
                        )
                      : reservaProvider.reservas.isEmpty
                          ? Padding(
                              padding: const EdgeInsets.symmetric(vertical: 24),
                              child: Center(
                                child: Column(
                                  children: [
                                    Icon(
                                      Icons.event_available,
                                      size: 48,
                                      color: Colors.grey[400],
                                    ),
                                    const SizedBox(height: 16),
                                    Text(
                                      'No tienes reservas activas',
                                      style: theme.textTheme.bodyLarge?.copyWith(
                                        color: Colors.grey[600],
                                      ),
                                    ),
                                  ],
                                ),
                              ),
                            )
                          : ListView.separated(
                              shrinkWrap: true,
                              physics: const NeverScrollableScrollPhysics(),
                              itemCount: reservaProvider.reservas.length,
                              separatorBuilder: (context, index) => Divider(
                                height: 1,
                                indent: 16,
                                color: const Color.fromARGB(255, 255, 8, 8),
                              ),
                              itemBuilder: (context, index) {
                                final reserva = reservaProvider.reservas[index];
                                final isLastItem =
                                    index == reservaProvider.reservas.length - 1;

                                return Container(
                                  decoration: BoxDecoration(
                                    color: index % 2 == 0
                                        ? Colors.grey[50]
                                        : Colors.white,
                                    borderRadius: isLastItem
                                        ? const BorderRadius.vertical(
                                            bottom: Radius.circular(12))
                                        : null,
                                  ),
                                  child: InkWell(
                                    borderRadius: BorderRadius.circular(12),
                                    onTap: () {
                                      // Acción al tocar la reserva
                                    },
                                    splashColor: Colors.deepPurple.withOpacity(0.1),
                                    highlightColor:
                                        Colors.deepPurple.withOpacity(0.05),
                                    child: Padding(
                                      padding: const EdgeInsets.symmetric(
                                          vertical: 12, horizontal: 8),
                                      child: Row(
                                        children: [
                                          Container(
                                            width: 48,
                                            height: 48,
                                            decoration: BoxDecoration(
                                              gradient: LinearGradient(
                                                colors: [
                                                  Colors.deepPurple[400]!,
                                                  Colors.indigo[400]!,
                                                ],
                                                begin: Alignment.topLeft,
                                                end: Alignment.bottomRight,
                                              ),
                                              shape: BoxShape.circle,
                                            ),
                                            child: Icon(
                                              Icons.event_available,
                                              color: Colors.white,
                                              size: 24,
                                            ),
                                          ),
                                          const SizedBox(width: 16),
                                          Expanded(
                                            child: Column(
                                              crossAxisAlignment:
                                                  CrossAxisAlignment.start,
                                              children: [
                                                Text(
                                                  reserva.consultorio,
                                                  style: theme.textTheme.titleMedium
                                                      ?.copyWith(
                                                    fontWeight: FontWeight.bold,
                                                    color: Colors.grey[800],
                                                  ),
                                                ),
                                                const SizedBox(height: 4),
                                                RichText(
                                                  text: TextSpan(
                                                    style: theme.textTheme.bodyMedium
                                                        ?.copyWith(
                                                      color: Colors.grey[600],
                                                    ),
                                                    children: [
                                                      TextSpan(
                                                        text:
                                                            '${formatearFecha(reserva.fecha)}\n',
                                                      ),
                                                      TextSpan(
                                                        text:
                                                            'De ${formatearHora(reserva.horaInicio)} a ${formatearHora(reserva.horaFin)}',
                                                        style: theme.textTheme.bodyMedium
                                                            ?.copyWith(
                                                          color: Colors
                                                              .deepPurple[600],
                                                          fontWeight:
                                                              FontWeight.w600,
                                                        ),
                                                      ),
                                                    ],
                                                  ),
                                                ),
                                              ],
                                            ),
                                          ),
                                          Icon(
                                            Icons.chevron_right,
                                            color: Colors.grey[400],
                                          ),
                                        ],
                                      ),
                                    ),
                                  ),
                                );
                              },
                            ),
                ],
              ),
            ),
          ),
        ),
      ),
    );
  }
}
