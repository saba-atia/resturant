<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.admincss')
    <style>
        /* Main Container */
        .admin-container {
            padding: 30px;
            margin-top: 80px;
            margin-left: 250px;
            margin-right: 30px;
        }
        
        /* Form Styling */
        .food-form {
            background-color: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            max-width: 600px;
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
            color: #333;
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
        .food-table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        
        .food-table th {
            background-color: #2c3e50;
            color: white;
            padding: 15px;
            text-align: center;
            font-weight: 600;
        }
        
        .food-table td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #eee;
            color: #333;
        }
        
        .food-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        .food-table tr:hover {
            background-color: #f1f5f9;
        }
        
        .food-image {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        
        .action-btn {
            padding: 8px 12px;
            border-radius: 4px;
            font-size: 14px;
            text-decoration: none;
            margin: 0 5px;
            transition: all 0.3s;
            display: inline-block;
        }
        
        .delete-btn {
            background-color: #e74c3c;
            color: white;
        }
        
        .delete-btn:hover {
            background-color: #c0392b;
        }
        
        .update-btn {
            background-color: #f39c12;
            color: white;
        }
        
        .update-btn:hover {
            background-color: #e67e22;
        }
        
        .page-header {
            color: #2c3e50;
            margin-bottom: 25px;
            font-size: 24px;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container-scroller">
        @include('admin.navbar')
        
        <div class="admin-container">
            <h2 class="page-header">Food Menu Management</h2>
            
            <!-- Food Form -->
            <form action="{{url('/uploadfood')}}" method="post" enctype="multipart/form-data" class="food-form">
                @csrf
                <h3 style="margin-bottom: 20px; color: #2c3e50;">Add New Food Item</h3>
                
                <div class="form-group">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-input" placeholder="Enter food title" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Price</label>
                    <input type="number" name="price" class="form-input" placeholder="Enter price" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <input type="text" name="description" class="form-input" placeholder="Enter description" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-input" required>
                </div>
                
                <div class="form-group">
                    <input type="submit" value="Add Food Item" class="submit-btn">
                </div>
            </form>
            
            <!-- Food Table -->
            <table class="food-table">
                <thead>
                    <tr>
                        <th>Food Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $food)
                    <tr>
                        <td>{{ $food->title }}</td>
                        <td>${{ number_format($food->price, 2) }}</td>
                        <td>{{ $food->description }}</td>
                        <td><img class="food-image" src="/foodimage/{{ $food->image }}" alt="{{ $food->title }}"></td>
                        <td>
                            <a href="{{url('/updateview',$food->id)}}" class="action-btn update-btn">Update</a>
                            <a href="{{url('/deletemenu',$food->id)}}" class="action-btn delete-btn">Delete</a>
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