<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.admincss')
    <style>
        /* Main Container */
        .reservations-container {
            padding: 30px;
            margin-top: 80px;
            margin-left: 250px;
            margin-right: 30px;
        }
        
        /* Table Styling */
        .reservations-table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        
        .reservations-table th {
            background-color: #2c3e50;
            color: white;
            padding: 15px;
            text-align: center;
            font-weight: 600;
            font-size: 15px;
        }
        
        .reservations-table td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #f0f0f0;
            color: #333;
        }
        
        .reservations-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        .reservations-table tr:hover {
            background-color: #f1f5f9;
        }
        
        /* Header Styling */
        .page-header {
            color: #2c3e50;
            margin-bottom: 25px;
            font-size: 24px;
            font-weight: 600;
            padding-bottom: 10px;
            border-bottom: 2px solid #eee;
        }
    </style>
</head>
<body>
    <div class="container-scroller">
        @include('admin.navbar')
        
        <div class="reservations-container">
            <h2 class="page-header">Reservations Management</h2>
            
            <table class="reservations-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $reservation)
                    <tr>
                        <td>{{ $reservation->name }}</td>
                        <td>{{ $reservation->email }}</td>
                        <td>{{ $reservation->phone }}</td>
                        <td>{{ date('M d, Y', strtotime($reservation->date)) }}</td>
                        <td>{{ date('h:i A', strtotime($reservation->time)) }}</td>
                        <td>{{ $reservation->message }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('admin.adminscript')
</body>
</html>