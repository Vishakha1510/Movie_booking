import 'package:flutter/material.dart';

class ShowsScreen extends StatelessWidget {
  const ShowsScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text("Shows")),
      body: Center(
        child: Text(
          "Shows API integration goes here",
          style: TextStyle(fontSize: 18),
        ),
      ),
    );
  }
}
