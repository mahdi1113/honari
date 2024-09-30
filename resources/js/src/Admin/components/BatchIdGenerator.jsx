import React from "react";

const BatchIdGenerator = ({ length = 10 }) => {

    const characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    let batchId = "";
    for (let i = 0; i < length; i++) {
      const randomIndex = Math.floor(Math.random() * characters.length);
      batchId += characters[randomIndex];
    }
    return batchId;

};

export default BatchIdGenerator;
