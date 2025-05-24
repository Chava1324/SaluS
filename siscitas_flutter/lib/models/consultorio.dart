class Consultorio {
  final int id;
  final String nombre;
  final String ubicacion;

  Consultorio({
    required this.id,
    required this.nombre,
    required this.ubicacion,
  });

  factory Consultorio.fromJson(Map<String, dynamic> json) {
    return Consultorio(
      id: json['id'],
      nombre: json['nombre'],
      ubicacion: json['ubicacion'],
    );
  }
}
