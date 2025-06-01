<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.admincss')
    <style>
      /* Main Form Container */
      .update-chef-form {
        max-width: 800px;
        margin: 80px auto;
        padding: 30px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      }
      
      /* Form Title */
      .form-title {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 30px;
        font-size: 28px;
        font-weight: 600;
      }
      
      /* Form Input Groups */
      .form-group {
        margin-bottom: 25px;
      }
      
      .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #34495e;
      }
      
      .form-group input[type="text"] {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
        transition: all 0.3s;
        color: #2c3e50;
      }
      
      .form-group input[type="text"]:focus {
        border-color: #3498db;
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        outline: none;
      }
      
      /* Image Preview */
      .image-preview {
        margin: 20px 0;
        text-align: center;
      }
      
      .image-preview img {
        max-height: 300px;
        max-width: 100%;
        border-radius: 5px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
        border: 1px solid #eee;
      }
      
      /* File Input */
      .file-input {
        position: relative;
        margin: 20px 0;
      }
      
      .file-input label {
        display: block;
        margin-bottom: 8px;
      }
      
      .file-input input[type="file"] {
        width: 100%;
        padding: 10px;
        border: 1px dashed #3498db;
        border-radius: 5px;
        background: #f8f9fa;
      }
      
      /* Submit Button */
      .submit-btn {
        text-align: center;
        margin-top: 30px;
      }
      
      .submit-btn input[type="submit"] {
        background: #3498db;
        color: white;
        border: none;
        padding: 12px 30px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s;
        font-weight: 500;
      }
      
      .submit-btn input[type="submit"]:hover {
        background: #2980b9;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(52, 152, 219, 0.3);
      }
      
      /* Responsive Design */
      @media (max-width: 768px) {
        .update-chef-form {
          margin: 40px 20px;
          padding: 20px;
        }
        
        .form-title {
          font-size: 24px;
        }
      }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.navbar')

      <form action="{{url('/updatefoodchef',$data->id)}}" method="POST" enctype="multipart/form-data" class="update-chef-form">
        @csrf
        <h2 class="form-title">Update Chef Details</h2>
        
        <div class="form-group">
          <label>Chef Name</label>
          <input type="text" name="name" value="{{$data->name}}" required>
        </div>

        <div class="form-group">
          <label>Speciality</label>
          <input type="text" name="speciality" value="{{$data->speciality}}" required>
        </div>

        <div class="image-preview">
          <label>Current Image</label>
          <img src="chefimage/{{$data->image}}" alt="Current Chef Image">
        </div>

        <div class="file-input">
          <label>Upload New Image</label>
          <input type="file" name="image">
        </div>

        <div class="submit-btn">
          <input type="submit" value="Update Chef">
        </div>
      </form>
    </div>
    
    @include('admin.adminscript')
  </body>
</html>