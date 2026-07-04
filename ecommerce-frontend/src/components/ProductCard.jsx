function ProductCard({ product, addToCart }) {
  return (
    <div
      style={{
        border: "1px solid #ddd",
        padding: "20px",
        marginBottom: "20px",
        borderRadius: "10px",
      }}
    >
      <h3>{product.name}</h3>

      <p>{product.description}</p>

      <p>
        <strong>Category:</strong> {product.category}
      </p>

      <p>
        <strong>Price:</strong> ${product.price}
      </p>

      <p>
        <strong>Stock:</strong> {product.stock}
      </p>

      <button onClick={() => addToCart(product.id)}>
        Add To Cart
      </button>
    </div>
  );
}

export default ProductCard;
