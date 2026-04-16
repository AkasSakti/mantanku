import 'package:flutter/material.dart';

import '../models/mantan.dart';
import '../services/mantan_service.dart';
import 'mantan_form_page.dart';

class MantanListPage extends StatefulWidget {
  const MantanListPage({super.key});

  @override
  State<MantanListPage> createState() => _MantanListPageState();
}

class _MantanListPageState extends State<MantanListPage> {
  final MantanService _service = MantanService();
  late Future<List<Mantan>> _futureMantan;

  @override
  void initState() {
    super.initState();
    _futureMantan = _service.getMantan();
  }

  Future<void> _reload() async {
    setState(() {
      _futureMantan = _service.getMantan();
    });
    await _futureMantan;
  }

  Future<void> _openForm({Mantan? mantan}) async {
    final result = await Navigator.of(context).push<Mantan>(
      MaterialPageRoute(
        builder: (_) => MantanFormPage(mantan: mantan),
      ),
    );

    if (result == null) {
      return;
    }

    try {
      if (mantan == null) {
        await _service.createMantan(result);
      } else {
        await _service.updateMantan(result);
      }
      await _reload();
      _showMessage(mantan == null ? 'Data berhasil ditambahkan.' : 'Data berhasil diperbarui.');
    } catch (error) {
      _showMessage(error.toString(), isError: true);
    }
  }

  Future<void> _delete(Mantan mantan) async {
    final confirmed = await showDialog<bool>(
          context: context,
          builder: (context) => AlertDialog(
            title: const Text('Hapus Data'),
            content: Text('Hapus ${mantan.namaMantan}?'),
            actions: [
              TextButton(
                onPressed: () => Navigator.of(context).pop(false),
                child: const Text('Batal'),
              ),
              FilledButton(
                onPressed: () => Navigator.of(context).pop(true),
                child: const Text('Hapus'),
              ),
            ],
          ),
        ) ??
        false;

    if (!confirmed) {
      return;
    }

    try {
      await _service.deleteMantan(mantan.idMantan!);
      await _reload();
      _showMessage('Data berhasil dihapus.');
    } catch (error) {
      _showMessage(error.toString(), isError: true);
    }
  }

  void _showMessage(String message, {bool isError = false}) {
    ScaffoldMessenger.of(context).showSnackBar(
      SnackBar(
        content: Text(message),
        backgroundColor: isError ? Colors.red : Colors.green,
      ),
    );
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('CRUD Mantan'),
      ),
      body: RefreshIndicator(
        onRefresh: _reload,
        child: FutureBuilder<List<Mantan>>(
          future: _futureMantan,
          builder: (context, snapshot) {
            if (snapshot.connectionState == ConnectionState.waiting) {
              return const Center(child: CircularProgressIndicator());
            }

            if (snapshot.hasError) {
              return ListView(
                children: [
                  const SizedBox(height: 120),
                  Icon(Icons.error_outline, size: 56, color: Colors.red.shade400),
                  const SizedBox(height: 12),
                  Center(
                    child: Padding(
                      padding: const EdgeInsets.symmetric(horizontal: 24),
                      child: Text(
                        'Gagal mengambil data.\n${snapshot.error}',
                        textAlign: TextAlign.center,
                      ),
                    ),
                  ),
                ],
              );
            }

            final items = snapshot.data ?? [];

            if (items.isEmpty) {
              return ListView(
                children: const [
                  SizedBox(height: 120),
                  Center(child: Text('Belum ada data mantan.')),
                ],
              );
            }

            return ListView.separated(
              padding: const EdgeInsets.all(16),
              itemCount: items.length,
              separatorBuilder: (_, __) => const SizedBox(height: 12),
              itemBuilder: (context, index) {
                final mantan = items[index];
                return Card(
                  child: ListTile(
                    contentPadding: const EdgeInsets.all(16),
                    title: Text(
                      mantan.namaMantan,
                      style: const TextStyle(fontWeight: FontWeight.bold),
                    ),
                    subtitle: Padding(
                      padding: const EdgeInsets.only(top: 8),
                      child: Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          Text('ID: ${mantan.idMantan}'),
                          Text('Alamat: ${mantan.alamat}'),
                          Text('No HP: ${mantan.noHp}'),
                        ],
                      ),
                    ),
                    trailing: Column(
                      mainAxisAlignment: MainAxisAlignment.center,
                      children: [
                        IconButton(
                          onPressed: () => _openForm(mantan: mantan),
                          icon: const Icon(Icons.edit),
                        ),
                        IconButton(
                          onPressed: () => _delete(mantan),
                          icon: const Icon(Icons.delete),
                        ),
                      ],
                    ),
                  ),
                );
              },
            );
          },
        ),
      ),
      floatingActionButton: FloatingActionButton.extended(
        onPressed: () => _openForm(),
        icon: const Icon(Icons.add),
        label: const Text('Tambah'),
      ),
    );
  }
}
