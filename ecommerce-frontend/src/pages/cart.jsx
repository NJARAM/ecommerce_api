import { useEffect, useState } from "react";
import api from "../api/axios";

function Cart() {
  const [cartItems, setCartItems] = useState([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    loadCart();
  }, []);

  const loadCart = async () => {
    try {
      const response = await api.get("/cart");
      setCartItems(response.data.data);
    } catch (error) {
      console.log(error);
    } finally {
      setLoading(false);
    }
  };

  const updateQuantity = async (id, quantity) => {
    if (quantity < 1) return;

    await api.put(`/cart/${id}`, {
      quantity,
    });

    loadCart();
  };

  const removeItem = async (id) => {
    await api.delete(`/cart/${id}`);
    loadCart();
  };

  const checkout = async () => {
    await api.post("/orders");
    alert("Order placed successfully!");
    loadCart();
  };

  const total = cartItems.reduce((sum, item) => {
    return sum + item.product.price * item.quantity;
  }, 0);

  if (loading) return <h2>Loading...</h2>;

  return (
    <div style={{ padding: "30px" }}>
      <h1>Shopping Cart</h1>

      {cartItems.length === 0 ? (
        <p>Your cart is empty.</p>
      ) : (
        <>
          {cartItems.map((item) => (
            <div
              key={item.id}
              style={{
                border: "1px solid #ccc",
                padding: "15px",
                marginBottom: "10px",
              }}
            >
              <h3>{item.product.name}</h3>

              <p>Price: ${item.product.price}</p>

              <p>Quantity: {item.quantity}</p>

              <button
                onClick={() =>
                  updateQuantity(item.id, item.quantity - 1)
                }
              >
                -
              </button>

              <button
                onClick={() =>
                  updateQuantity(item.id, item.quantity + 1)
                }
              >
                +
              </button>

              <button
                onClick={() => removeItem(item.id)}
              >
                Remove
              </button>
            </div>
          ))}

          <hr />

          <h2>Total: ${total.toFixed(2)}</h2>

          <button onClick={checkout}>
            Checkout
          </button>
        </>
      )}
    </div>
  );
}

export default Cart;
