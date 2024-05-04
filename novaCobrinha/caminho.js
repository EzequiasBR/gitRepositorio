export function achaCaminho(inicio, fim) {
  let abertos = [];
  let fechados = [];
  abertos.push(inicio);

  while (abertos.length > 0) {
    let menorIndice = 0;
    for (let i = 0; i < abertos.length; i++) {
      if (abertos[i].f < abertos[menorIndice].f) {
        menorIndice = i;
      }
    }

    let atual = abertos[menorIndice];
    if (atual === fim) {
      let caminho = [];
      let atualCaminho = atual;
      while (atualCaminho.pai) {
        caminho.push(atualCaminho);
        atualCaminho = atualCaminho.pai;
      }
      return caminho.reverse();
    }

    abertos.splice(menorIndice, 1);
    fechados.push(atual);
   
    for (let i = 0; i < atual.length; i++) {
      let vizinho = atual[i];
      if (!fechados.includes(vizinho)) {
        let tempG = atual.g + 1;
        if (abertos.includes(vizinho)) {
          if (tempG < vizinho.g) {
            vizinho.g = tempG;
          }
        } else {
          vizinho.g = tempG;
          abertos.push(vizinho);
        }

        vizinho.h = heuristic(vizinho, fim);
        vizinho.f = vizinho.g + vizinho.h;
        vizinho.pai = atual;
      }
    }
  }

  return [];
}

function heuristic(a, b) {
  return Math.abs(a.x - b.x) + Math.abs(a.y - b.y);
}

 