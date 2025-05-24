class Reserva {
  final int id;
  final String consultorio;
  final DateTime fecha;
  final DateTime horaInicio;
  final DateTime horaFin;

  Reserva({
    required this.id,
    required this.consultorio,
    required this.fecha,
    required this.horaInicio,
    required this.horaFin,
  });

factory Reserva.fromJson(Map<String, dynamic> json) {
  return Reserva(
    id: json['id'],
    consultorio: json['consultorio'] ?? 'Sin nombree',
   fecha: json['fecha'] != null
    ? DateTime.parse(json['fecha'] + ' 00:00:00')
    : DateTime(2000, 1, 1),
horaInicio: (json['fecha'] != null && json['hora_inicio'] != null)
    ? DateTime.parse('${json['fecha']} ${json['hora_inicio']}')
    : DateTime(2000, 1, 1, 8, 0),
horaFin: (json['fecha'] != null && json['hora_fin'] != null)
    ? DateTime.parse('${json['fecha']} ${json['hora_fin']}')
    : DateTime(2000, 1, 1, 9, 0),
  );
}
}
