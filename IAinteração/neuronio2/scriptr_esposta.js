import {Perceptron} from 'script.js';
// Crie uma instância do Perceptron
let p = new Perceptron(numInputs);

// Suponha que você tenha um conjunto de dados de treinamento
let trainingData = [
  {inputs: [0, 0], target: 0},
  {inputs: [1, 0], target: 1},
  {inputs: [0, 1], target: 1},
  {inputs: [1, 1], target: 1}
];

// Treine o Perceptron com os dados de treinamento
for (let i = 0; i < trainingData.length; i++) {
  let data = trainingData[i];
  p.train(data.inputs, data.target);
}
