class Horario {
  final int id;
  final DateTime horaInicio;
  final DateTime horaFin;

  Horario({
    required this.id,
    required this.horaInicio,
    required this.horaFin,
  });

  factory Horario.fromJson(Map<String, dynamic> json) {
    return Horario(
      id: json['id'],
      horaInicio: DateTime.parse(json['hora_inicio']),
      horaFin: DateTime.parse(json['hora_fin']),
    );
  }
}
