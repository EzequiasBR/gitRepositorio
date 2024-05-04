class Synapse {
   constructor(presynapticNeurons, postsynapticNeuron, weight, type) {
      this.presynapticNeurons = presynapticNeurons;
      this.postsynapticNeuron = postsynapticNeuron;
      this.weight = weight;
      this.type = type;
   }
}

class ExcitatorySynapse extends Synapse {
   constructor(presynapticNeurons, postsynapticNeuron, weight) {
      super(presynapticNeurons, postsynapticNeuron, weight, "excitatory");
   }
   calculatePSP() {
      let psp = 0;
      for (const presynapticNeuron of this.presynapticNeurons) {
         if (presynapticNeuron.firedRecently) {
            psp += presynapticNeuron.potential * this.weight;
         }
      }
      return psp;
   }
}

class InhibitorySynapse extends Synapse {
   constructor(presynapticNeurons, postsynapticNeuron, weight) {
      super(presynapticNeurons, postsynapticNeuron, weight, "inhibitory");
   }
   calculatePSP() {
      let psp = 0;
      for (const presynapticNeuron of this.presynapticNeurons) {
         if (presynapticNeuron.firedRecently) {
            psp -= presynapticNeuron.potential * this.weight;
         }
      }
      return psp;
   }
}

const neuron = {
   potential: 70, // mV
   dopamine: 50, // ng/mL
   connections: [],
   firingRate: 50, // Hz
   synapses: [
      new ExcitatorySynapse([], {}, 0.5),
      // Adicione mais sinapses conforme necessário
   ]
};

const dopamine = {
   tyrosine: 1000, // ng/mL
};

function calculatePSP(synapse) {
   let psp = 0;
   for (const presynapticNeuron of synapse.presynapticNeurons) {
      psp += presynapticNeuron.potential * synapse.weight;
   }
   return psp;
}

function processInformation() {
   let totalInput = 0;
   for (const synapse of neuron.synapses) {
      const psp = calculatePSP(synapse);
      totalInput += psp;
   }
   const postSynapticPotential = totalInput + neuron.potential;
   if (postSynapticPotential >= 70) {
      neuron.potential = -70;
   } else {
      neuron.potential += postSynapticPotential;
   }
}

function generateActionPotentials() {
   if (neuron.potential >= 70) {
      neuron.refractoryPeriod = true;
      setTimeout(function () {
         neuron.refractoryPeriod = false;
      }, 2);
   }
}

function releaseDopamine() {
   const releasedDopamine = neuron.firingRate * 0.1;
   neuron.dopamine += releasedDopamine;
}

function produceDopamine() {
   const producedDopamine = dopamine.tyrosine * 0.001;
   dopamine.tyrosine -= producedDopamine;
   neuron.dopamine += producedDopamine;
}

function modulateSynapticPlasticity() {
   if (neuron.dopamine > 50 && neuron.firingRate > 50) {
      for (const synapse of neuron.synapses) {
         if (synapse.postSynapticPotential > 50 && synapse.coincidence) {
            synapse.strength += 0.1; // Aumento da força da sinapse
         }
      }
   }
}

function influenceFiringRate() {
   if (neuron.dopamine < 50) {
      neuron.firingRate *= 1.1; // Aumento da frequência de disparos
   } else if (neuron.dopamine > 70) {
      neuron.firingRate *= 0.9; // Diminuição da frequência de disparos
   }
   neuron.firingRate *= 0.999 + 0.001 * neuron.firingRate;
   neuron.firingRate = Math.max(0, Math.min(100, neuron.firingRate));
}

function updateUI() {
   document.getElementById("dopamine-chart").innerHTML = neuron.dopamine;
   document.getElementById("firing-rate").value = neuron.firingRate;
}

let data = [{
   x: [0],  // valores iniciais do eixo x
   y: [0],  // valores iniciais do eixo y
   mode: 'lines',
   line: { color: '#80CAF6' }
}]

Plotly.newPlot('my-plot', data, {
   title: 'Simulação de Neurônio',
   xaxis: {
      title: 'Tempo (ms)'
   },
   yaxis: {
      title: 'Potencial de Membrana (mV)'
   }
});

function updatePlot(newData) {
   Plotly.extendTraces('my-plot', {
      x: [[newData.x]],  // novos valores do eixo x
      y: [[newData.y]]   // novos valores do eixo y
   }, [0])  // o índice do traço a ser estendido
}

// Restante do código...

function influenceFiringRate() {
   let oscillationFactor = 10 * Math.sin(2 * Date.now() / 1000); // Oscilação sinusoidal com o dobro da frequência e amplitude maior
   if (neuron.dopamine < 50) {
       neuron.firingRate *= 1.1 + oscillationFactor; // Aumento da frequência de disparos
   } else if (neuron.dopamine > 70) {
       neuron.firingRate *= 0.9 + oscillationFactor; // Diminuição da frequência de disparos
   }
   neuron.firingRate *= 0.999 + 0.001 * neuron.firingRate;
   neuron.firingRate = Math.max(0, Math.min(100, neuron.firingRate));
}

function simulate() {
   for (let i = 0; i < 20; i++) {
      processInformation();
      generateActionPotentials();
      releaseDopamine();
      produceDopamine();
      modulateSynapticPlasticity();
      influenceFiringRate();

      // Atualize o gráfico
      let newData = {
         x: i,  // Substitua isso pelo valor real do eixo x
         y: neuron.potential  // Substitua isso pelo valor real do eixo y
      };
      updatePlot(newData);

      updateUI();
   }
}


$(document).ready(function() {
   // Atualize a taxa de disparo do neurônio quando o valor do controle deslizante muda
   $("#firing-rate").on("input", function() {
       neuron.firingRate = this.value;
       updateUI();  // Atualize a interface do usuário após alterar a taxa de disparo
   });

   $("#simulate").click(function() {
       simulate();
   });
});


