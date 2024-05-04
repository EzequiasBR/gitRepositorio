export class Perceptron {
   constructor(numInputs) {
     this.weights = new Array(numInputs).fill(0);
     this.bias = 0;
     this.hormonio = new Hormonios("ativo", 0, 1);
   }
 
   predict(inputs) {
     let sum = this.bias;
     for (let i = 0; i < this.weights.length; i++) {
       sum += this.weights[i] * inputs[i];
     }
     return this.activationFunction(sum);
   }
 
   activationFunction(sum) {
     // Função de ativação (por exemplo, função sigmoide)
     let output = 1 / (1 + Math.exp(-sum));
 
     // Modificar a saída com base no nível do hormônio
     output *= this.hormonio.nivelAtual;
 
     return output;
   }
 
   train(inputs, target) {
     const guess = this.predict(inputs);
     const error = target - guess;
 
     // Ajustar pesos e bias
     for (let i = 0; i < this.weights.length; i++) {
       this.weights[i] += error * inputs[i];
     }
     this.bias += error;
 
     // Atualizar o nível do hormônio
     this.hormonio.atualizarNivel(error, 1);
   }
 }
 