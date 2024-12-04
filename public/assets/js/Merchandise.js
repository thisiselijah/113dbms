import React, { useState, useEffect } from "react";
import Card from "./Card";

const Merchandise = (props) => {
  const renderCards = () => {
    return props.items.map((item, index) => <Card key={index} {...item} />);
  };
  return <div className="cart_item">{renderCards()}</div>;
};

export default Merchandise;
Í;
