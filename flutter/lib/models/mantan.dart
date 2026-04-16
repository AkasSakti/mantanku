class Mantan {
  const Mantan({
    required this.idMantan,
    required this.namaMantan,
    required this.alamat,
    required this.noHp,
  });

  final int? idMantan;
  final String namaMantan;
  final String alamat;
  final String noHp;

  factory Mantan.fromJson(Map<String, dynamic> json) {
    return Mantan(
      idMantan: json['id_mantan'] as int?,
      namaMantan: (json['Nama_mantan'] ?? '') as String,
      alamat: (json['Alamat'] ?? '') as String,
      noHp: (json['No_Hp'] ?? '') as String,
    );
  }

  Map<String, dynamic> toJson() {
    return {
      'Nama_mantan': namaMantan,
      'Alamat': alamat,
      'No_Hp': noHp,
    };
  }
}
