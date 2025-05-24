import 'package:flutter/material.dart';

class CalendarEvent {
  final String title;
  final DateTime startTime;
  final DateTime endTime;
  final Color color;

  CalendarEvent({
    required this.title,
    required this.startTime,
    required this.endTime,
    required this.color,
  });
}
