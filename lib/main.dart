import 'package:movie_php/screens/bookings_screen.dart';
import 'package:movie_php/screens/movies_screen.dart';
import 'package:movie_php/screens/seats_screen.dart';
import 'package:movie_php/screens/shows_screen.dart';
import 'package:movie_php/screens/theater_screen.dart';
import 'package:movie_php/screens/users_screen.dart';

void main() {
  runApp(MovieBookingApp());
}

class MovieBookingApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Movie Booking System',
      debugShowCheckedModeBanner: false,
      theme: ThemeData(useMaterial3: true, colorSchemeSeed: Colors.red),
      home: MainMenu(),
    );
  }
}

class MainMenu extends StatelessWidget {
  final List<_MenuItem> menuItems = [
    _MenuItem("Users", Icons.person, UsersScreen()),
    _MenuItem("Movies", Icons.movie, MoviesScreen()),
    _MenuItem("Bookings", Icons.book_online, BookingsScreen()),
    _MenuItem("Theaters", Icons.theaters, TheatersScreen()),
    _MenuItem("Shows", Icons.schedule, ShowsScreen()),
    _MenuItem("Seats", Icons.event_seat, SeatsScreen()),
  ];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text('🎬 Movie Booking System')),
      body: ListView.builder(
        itemCount: menuItems.length,
        itemBuilder: (context, index) {
          final item = menuItems[index];
          return Card(
            margin: EdgeInsets.symmetric(horizontal: 16, vertical: 8),
            child: ListTile(
              leading: Icon(item.icon, color: Colors.red),
              title: Text(item.title),
              trailing: Icon(Icons.arrow_forward_ios),
              onTap:
                  () => Navigator.push(
                    context,
                    MaterialPageRoute(builder: (_) => item.page),
                  ),
            ),
          );
        },
      ),
    );
  }
}

class _MenuItem {
  final String title;
  final IconData icon;
  final Widget page;
  _MenuItem(this.title, this.icon, this.page);
}
