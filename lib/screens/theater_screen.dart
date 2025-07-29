import 'package:flutter/material.dart';

class TheatersScreen extends StatelessWidget {
  const TheatersScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text("Theaters")),
      body: Center(
        child: Text(
          "Theaters API integration goes here",
          style: TextStyle(fontSize: 18),
        ),
      ),
    );
  }
}
