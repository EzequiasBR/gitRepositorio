

// Criando a rede neural
var RedeNeural = function(input, hidden, output) {
    // Criando as camadas
    var inputLayer = new synaptic.Layer(input);
    var hiddenLayer = new synaptic.Layer(hidden);
    var outputLayer = new synaptic.Layer(output);

    // Conectando as camadas
    inputLayer.project(hiddenLayer);
    hiddenLayer.project(outputLayer);

    // Criando a rede neural
    this.network = new synaptic.Network({
        input: inputLayer,
        hidden: [hiddenLayer],
        output: outputLayer
    });
};

// Criando uma nova rede neural com 2 neurônios de entrada, 3 neurônios ocultos e 1 neurônio de saída
var minhaRede = new RedeNeural(2, 3, 1);

// Importando a biblioteca Synaptic
// Criando a arquitetura da rede neural
var Layer = synaptic.Layer;
var Network = synaptic.Network;

var inputLayer = new Layer(2); // Camada de entrada com 2 neurônios
var hiddenLayer = new Layer(3); // Camada oculta com 3 neurônios
var outputLayer = new Layer(1); // Camada de saída com 1 neurônio

// Conectando as camadas
inputLayer.project(hiddenLayer);
hiddenLayer.project(outputLayer);

var myNetwork = new Network({
    input: inputLayer,
    hidden: [hiddenLayer],
    output: outputLayer
});

// Dados de treinamento
var trainingSet = [
    {
        input: [0, 0],
        output: [0]
    },
    {
        input: [0, 1],
        output: [1]
    },
    {
        input: [1, 0],
        output: [1]
    },
    {
        input: [1, 1],
        output: [0]
    }
];

// Configurações do treinamento
var learningRate = .3;
var iterations = 20000;

// Treinamento da rede
for (var i = 0; i < iterations; i++) {
    trainingSet.forEach(function(data) {
        myNetwork.activate(data.input);
        myNetwork.propagate(learningRate, data.output);
    });
}

// Testando a rede
console.log(myNetwork.activate([0,0])); // Saída próxima de 0
console.log(myNetwork.activate([0,1])); // Saída próxima de 1
console.log(myNetwork.activate([1,0])); // Saída próxima de 1
console.log(myNetwork.activate([1,1])); // Saída próxima de 0
