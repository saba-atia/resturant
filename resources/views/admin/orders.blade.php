<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.admincss')
  <style>
    :root {
      --primary-color: #4361ee;
      --secondary-color: #3f37c9;
      --accent-color: #4895ef;
      --light-color: #f8f9fa;
      --dark-color: #2b2d42;
      --text-color: #495057;
      --border-radius: 8px;
      --box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
      --transition: all 0.3s ease;
    }
    
    /* Main Container */
    .container-scroller {
      background: var(--light-color);
      min-height: 100vh;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    /* Content Container */
    .container {
      padding: 2rem;
      margin-top: 1rem;
      max-width: 1400px;
      margin-left: auto;
      margin-right: auto;
    }
    
    /* Page Title */
    .page-title {
      color: var(--dark-color);
      margin-bottom: 2rem;
      font-weight: 700;
      text-align: center;
      font-size: 2.2rem;
      position: relative;
      padding-bottom: 0.5rem;
    }
    
    .page-title::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 80px;
      height: 4px;
      background: var(--accent-color);
      border-radius: 2px;
    }
    
    /* Search Form */
    .search-form {
      display: flex;
      justify-content: center;
      gap: 1rem;
      margin-bottom: 2rem;
      flex-wrap: wrap;
    }
    
    .search-input {
      border: 2px solid var(--primary-color);
      border-radius: var(--border-radius);
      padding: 0.75rem 1.25rem;
      font-size: 1rem;
      width: 350px;
      max-width: 100%;
      transition: var(--transition);
      color: var(--text-color);
    }
    
    .search-input:focus {
      border-color: var(--secondary-color);
      box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
      outline: none;
    }
    
    .search-btn {
      background-color: var(--primary-color) !important;
      border: none;
      border-radius: var(--border-radius);
      padding: 0.75rem 1.5rem;
      color: white;
      font-weight: 600;
      cursor: pointer;
      transition: var(--transition);
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
    }
    
    .search-btn:hover {
      background-color: var(--secondary-color) !important;
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    /* Orders Table */
    .orders-table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0;
      margin-top: 1.5rem;
      box-shadow: var(--box-shadow);
      border-radius: var(--border-radius);
      overflow: hidden;
      background: white;
    }
    
    .orders-table thead {
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      color: white;
    }
    
    .orders-table th {
      padding: 1rem;
      text-align: center;
      font-weight: 600;
      font-size: 0.95rem;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    
    .orders-table tbody tr {
      transition: var(--transition);
    }
    
    .orders-table tbody tr:nth-child(even) {
      background-color: rgba(248, 249, 250, 0.5);
    }
    
    .orders-table tbody tr:hover {
      background-color: rgba(67, 97, 238, 0.05);
      transform: scale(1.005);
    }
    
    .orders-table td {
      padding: 1rem;
      text-align: center;
      color: var(--text-color);
      border-bottom: 1px solid rgba(0, 0, 0, 0.05);
      font-size: 0.95rem;
    }
    
    .orders-table td:first-child {
      font-weight: 500;
      color: var(--dark-color);
    }
    
    .price-cell {
      color: #2e7d32;
      font-weight: 600;
    }
    
    .total-price-cell {
      color: #c62828;
      font-weight: 700;
    }
    
    /* Empty State */
    .empty-state {
      text-align: center;
      padding: 3rem;
      color: var(--text-color);
    }
    
    .empty-state-icon {
      font-size: 4rem;
      color: #adb5bd;
      margin-bottom: 1rem;
    }
    
    /* Responsive Design */
    @media (max-width: 992px) {
      .container {
        padding: 1.5rem;
      }
      
      .page-title {
        font-size: 1.8rem;
      }
    }
    
    @media (max-width: 768px) {
      .container {
        padding: 1rem;
      }
      
      .search-form {
        flex-direction: column;
        align-items: stretch;
      }
      
      .search-input {
        width: 100%;
      }
      
      .search-btn {
        width: 100%;
      }
      
      .orders-table {
        display: block;
        overflow-x: auto;
      }
      
      .orders-table th, 
      .orders-table td {
        padding: 0.75rem 0.5rem;
        font-size: 0.85rem;
      }
    }
    
    @media (max-width: 576px) {
      .page-title {
        font-size: 1.5rem;
      }
      
      .orders-table {
        font-size: 0.8rem;
      }
    }
  </style>
</head>
<body>
  <div class="container-scroller">
    @include('admin.navbar')

    <div class="container">
      <h1 class="page-title">Customer Orders</h1>
      
      <form class="search-form" action="{{url('/search')}}" method="get">
        <input 
          type="text" 
          name="search" 
          placeholder="Search by customer name or food..." 
          class="search-input"
        >
        <button type="submit" class="btn btn-success search-btn">
          <i class="mdi mdi-magnify"></i> Search
        </button>
      </form>

      @if(count($data) > 0)
        <table class="orders-table">
          <thead>
            <tr>
              <th>Customer</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Food</th>
              <th>Price</th>
              <th>Qty</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $order)
            <tr>
              <td>{{$order->name}}</td>
              <td>{{$order->phone}}</td>
              <td>{{$order->address}}</td>
              <td>{{$order->foodname}}</td>
              <td class="price-cell">${{number_format($order->price, 2)}}</td>
              <td>{{$order->quantity}}</td>
              <td class="total-price-cell">${{number_format($order->price * $order->quantity, 2)}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      @else
        <div class="empty-state">
          <div class="empty-state-icon">
            <i class="mdi mdi-cart-off"></i>
          </div>
          <h3>No Orders Found</h3>
          <p>There are currently no customer orders to display.</p>
        </div>
      @endif
    </div>
  </div>
  
  @include('admin.adminscript')
</body>
</html>