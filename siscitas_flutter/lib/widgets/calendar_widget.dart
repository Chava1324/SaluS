import 'package:flutter/material.dart';
import 'package:siscitas_flutter/models/calendar_event.dart';

class CalendarWidget extends StatelessWidget {
  final List<CalendarEvent> events;

  const CalendarWidget({
    super.key,
    required this.events,
  });

  @override
  Widget build(BuildContext context) {
    return ListView.builder(
      itemCount: events.length,
      itemBuilder: (context, index) {
        final event = events[index];
        return Card(
          margin: const EdgeInsets.symmetric(horizontal: 8, vertical: 4),
          child: ListTile(
            title: Text(event.title),
            subtitle: Text(
              '${event.startTime.hour}:${event.startTime.minute.toString().padLeft(2, '0')} '
              '- ${event.endTime.hour}:${event.endTime.minute.toString().padLeft(2, '0')}',
            ),
            tileColor: event.color.withOpacity(0.1),
            shape: RoundedRectangleBorder(
              borderRadius: BorderRadius.circular(8),
            ),
          ),
        );
      },
    );
  }
}
