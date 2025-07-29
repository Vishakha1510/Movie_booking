import 'package:flutter/material.dart';

class SeatsScreen extends StatelessWidget {
  const SeatsScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text("Seats")),
      body: Center(
        child: Text(
          "Seats API integration goes here",
          style: TextStyle(fontSize: 18),
        ),
      ),
    );
  }
}
