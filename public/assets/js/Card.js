import React, { useState, useEffect } from "react";


//購物車項目欄位

const Card = (props) => {
  return (
    <div>
      <div className="cart_img">
        <a href="#">
          <img src={props.image_path} alt="" />
        </a>
      </div>
      <div className="cart_info">
        <a href="#">{props.name}</a>
        <p>
          {props.quantity} x <span> $ {props.price} </span>
        </p>
      </div>
      <div className="cart_remove">   
        <a href="#">
          <i class="icon-close icons"></i>
        </a>
      </div>
    </div>
  );
};

export default Card;
