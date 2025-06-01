<x-app-layout>
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.admincss')
    <style>
      /* Main Form Container */
      .update-form-container {
        max-width: 800px;
        margin: 80px auto;
        padding: 40px;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
      }
      
      /* Form Styling */
      .update-form {
        display: flex;
        flex-direction: column;
        gap: 25px;
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
        display: flex;
        flex-direction: column;
        gap: 8px;
      }
      
      .form-group label {
        font-weight: 500;
        color: #4a5568;
        font-size: 16px;
      }
      
      .form-group input {
        padding: 12px 16px;
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        font-size: 16px;
        transition: all 0.3s ease;
        color: #2d3748;
      }
      
      .form-group input:focus {
        border-color: #4299e1;
        box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.2);
        outline: none;
      }
      
      /* Image Preview */
      .image-preview {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        margin: 15px 0;
      }
      
      .image-preview img {
        max-height: 250px;
        max-width: 100%;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        border: 1px solid #edf2f7;
      }
      
      /* File Input */
      .file-input {
        padding: 10px;
        border: 2px dashed #cbd5e0;
        border-radius: 6px;
        background: #f8fafc;
        text-align: center;
      }
      
      .file-input input[type="file"] {
        width: 100%;
      }
      
      /* Submit Button */
      .submit-btn {
        margin-top: 20px;
        text-align: center;
      }
      
      .submit-btn input[type="submit"] {
        background: #4299e1;
        color: white;
        border: none;
        padding: 12px 32px;
        font-size: 16px;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 500;
      }
      
      .submit-btn input[type="submit"]:hover {
        background: #3182ce;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(66, 153, 225, 0.3);
      }
      
      /* Responsive Design */
      @media (max-width: 768px) {
        .update-form-container {
          margin: 40px 20px;
          padding: 25px;
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

      <div class="update-form-container">
        <h2 class="form-title">Update Food Item</h2>
        
        <form action="{{ url('/update', $data->id) }}" method="post" enctype="multipart/form-data" class="update-form">
          @csrf
          
          <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" value="{{ $data->title }}" required>
          </div>

          <div class="form-group">
            <label>Price ($)</label>
            <input type="number" name="price" value="{{ $data->price }}" required min="0" step="0.01">
          </div>

          <div class="form-group">
            <label>Description</label>
            <input type="text" name="description" value="{{ $data->description }}" required>
          </div>

          <div class="image-preview">
            <label>Current Image</label>
            <img src="/foodimage/{{ $data->image }}" alt="Current Food Image">
          </div>

          <div class="form-group">
            <label>Upload New Image</label>
            <div class="file-input">
              <input type="file" name="image">
            </div>
          </div>

          <div class="submit-btn">
            <input type="submit" value="Update Food Item">
          </div>
        </form>
      </div>
    </div>

    @include('admin.adminscript')
  </body>
</html>