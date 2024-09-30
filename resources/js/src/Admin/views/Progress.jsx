import React from "react";

const Progress = ({ value }) => {
  const containerStyles = {
    height: 20,
    width: "100%",
    backgroundColor: "#e0e0df",
    borderRadius: 50,
    margin: 50,
  };

  const fillerStyles = {
    height: "100%",
    width: `${value}%`,
    backgroundColor: value < 100 ? "#007bff" : "#4caf50",
    borderRadius: "inherit",
    textAlign: "right",
    transition: "width 0.2s ease-in",
  };

  const labelStyles = {
    padding: 5,
    color: "white",
    fontWeight: "bold",
  };

  return (
    <div style={containerStyles}>
      <div style={fillerStyles}>
        <span style={labelStyles}>{`${value}%`}</span>
      </div>
    </div>
  );
};

export default Progress;
