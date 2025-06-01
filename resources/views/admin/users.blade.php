<x-app-layout>
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.admincss')
    <style>
      /* Main Content Container */
      .users-container {
        padding: 40px;
        margin-top: 80px;
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
      }
      
      /* Table Styling */
      .users-table {
        width: 100%;
        border-collapse: collapse;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        border-radius: 10px;
        overflow: hidden;
      }
      
      /* Table Header */
      .users-table thead th {
        background-color: #3498db;
        color: white;
        padding: 18px;
        text-align: center;
        font-weight: 600;
        font-size: 16px;
      }
      
      /* Table Body */
      .users-table tbody td {
        padding: 16px;
        text-align: center;
        border-bottom: 1px solid #e0e0e0;
        color: #333;
      }
      
      /* Alternate Row Colors */
      .users-table tbody tr:nth-child(even) {
        background-color: #f8f9fa;
      }
      
      .users-table tbody tr:nth-child(odd) {
        background-color: white;
      }
      
      /* Hover Effect */
      .users-table tbody tr:hover {
        background-color: #e3f2fd;
      }
      
      /* Action Buttons */
      .action-btn {
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
      }
      
      .delete-btn {
        background-color: #e74c3c;
        color: white;
      }
      
      .delete-btn:hover {
        background-color: #c0392b;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(231, 76, 60, 0.3);
      }
      
      .not-allowed {
        color: #7f8c8d;
        cursor: not-allowed;
      }
      
      /* Responsive Design */
      @media (max-width: 768px) {
        .users-container {
          padding: 20px;
        }
        
        .users-table {
          display: block;
          overflow-x: auto;
        }
        
        .users-table thead th,
        .users-table tbody td {
          padding: 12px;
        }
      }
      
      /* Page Title */
      .page-title {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 30px;
        font-size: 28px;
        font-weight: 600;
      }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.navbar')
      
      <div class="users-container">
        <h1 class="page-title">Users Management</h1>
        
        <table class="users-table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $user)
            <tr>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>
                @if($user->usertype == '0')
                  <a href="{{ url('/deleteuser', $user->id) }}" class="action-btn delete-btn">Delete</a>
                @else
                  <span class="not-allowed">Not Allowed</span>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    @include('admin.adminscript')
  </body>
</html>