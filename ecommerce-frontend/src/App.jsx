// import { Routes, Route } from "react-router-dom";

// function App() {
//   return (
//     <Routes>
//       <Route path="/" element={<h1>Ecommerce Frontend</h1>} />
//       <Route path="/login" element={<h1>Login Page</h1>} />
//       <Route path="/register" element={<h1>Register Page</h1>} />
//       <Route path="/products" element={<h1>Products Page</h1>} />
//       <Route path="/cart" element={<h1>Cart Page</h1>} />
//       <Route path="/orders" element={<h1>Orders Page</h1>} />
//     </Routes>
//   );
// }

// export default App;

import { Routes, Route } from "react-router-dom";
import Login from "./pages/Login";
import Register from "./pages/Register"
import Products from "./pages/Products";
import Cart from "./pages/Cart";

function App() {
  return (
    <Routes>
      <Route path="/" element={<h1>Ecommerce Frontend</h1>} />
      <Route path="/login" element={<Login />} />
      <Route path="/register" element={<Register />} />
      <Route path="/products" element={<Products />} />
      <Route path="/cart" element={<Cart />} />
      <Route path="/orders" element={<h1>Orders Page</h1>} />

    </Routes>
  );
}

export default App;
