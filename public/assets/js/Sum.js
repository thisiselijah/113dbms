import React from "react";

const Sum = ({ total }) => {
  return (
    <div className="mini_cart_table">
      <div className="cart_table_border">
        <div className="cart_total">
          <span>小計:</span>
          <span className="price">${total}</span>
        </div>
        <div className="cart_total mt-10">
          <span>總計:</span>
          <span className="price">${total}</span>
        </div>
      </div>
    </div>
  );
};

export default Sum;
