import 'package:flutter/material.dart';

import 'screens/mantan_list_page.dart';

void main() {
  runApp(const MantanApp());
}

class MantanApp extends StatelessWidget {
  const MantanApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'CRUD Mantan',
      debugShowCheckedModeBanner: false,
      theme: ThemeData(
        colorScheme: ColorScheme.fromSeed(seedColor: const Color(0xFF0F766E)),
        useMaterial3: true,
      ),
      home: const MantanListPage(),
    );
  }
}
