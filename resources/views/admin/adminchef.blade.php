<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.admincss')
    <style>
        /* Main Container */
        .admin-container {
            padding: 20px;
            margin-top: 60px;
            margin-left: 250px;
        }
        
        /* Form Styling */
        .chef-form {
            max-width: 600px;
            padding: 25px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
        }
        
        .form-input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            transition: border 0.3s;
        }
        
        .form-input:focus {
            border-color: #3498db;
            outline: none;
        }
        
        .submit-btn {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }
        
        .submit-btn:hover {
            background-color: #2980b9;
        }
        
        /* Table Styling */
        .chef-table {
            width: 100%;
            background: #fff;
            border-collapse: collapse;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        
        .chef-table th {
            background-color: #2c3e50;
            color: white;
            padding: 15px;
            text-align: center;
            font-weight: 600;
        }
        
        .chef-table td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #eee;
        }
        
        .chef-table tr:hover {
            background-color: #f8f9fa;
        }
        
        .action-btn {
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 14px;
            text-decoration: none;
            margin: 0 5px;
            transition: all 0.3s;
        }
        
        .update-btn {
            background-color: #f39c12;
            color: white;
        }
        
        .update-btn:hover {
            background-color: #e67e22;
        }
        
        .delete-btn {
            background-color: #e74c3c;
            color: white;
        }
        
        .delete-btn:hover {
            background-color: #c0392b;
        }
        
        .chef-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="container-scroller">
        @include('admin.navbar')
        
        <div class="admin-container">
            <!-- Chef Form -->
            <form action="{{url('/uploadchef')}}" method="POST" enctype="multipart/form-data" class="chef-form">
                @csrf
                <h3 style="margin-bottom: 20px; color: #2c3e50;">Add New Chef</h3>
                
                <div class="form-group">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-input" placeholder="Enter chef name" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Speciality</label>
                    <input type="text" name="speciality" class="form-input" placeholder="Enter speciality" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-input" required>
                </div>

                <div class="form-group">
                    <input type="submit" value="Add Chef" class="submit-btn">
                </div>
            </form>

            <!-- Chefs Table -->
            <h3 style="margin-bottom: 20px; color: #2c3e50;">Chefs List</h3>
            
            <table class="chef-table">
                <thead>
                    <tr>
                        <th>Chef Name</th>
                        <th>Speciality</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $chef)
                    <tr>
                        <td>{{$chef->name}}</td>
                        <td>{{$chef->speciality}}</td>
                        <td><img class="chef-image" src="chefimage/{{$chef->image}}" alt="Chef Image"></td>
                        <td>
                            <a href="{{url('/updatechef',$chef->id)}}" class="action-btn update-btn">Update</a>
                            <a href="{{url('/deletechef',$chef->id)}}" class="action-btn delete-btn">Delete</a>
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