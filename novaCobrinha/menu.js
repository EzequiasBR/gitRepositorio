export function Canvas(){
  let canvas = document.querySelector("canvas") ;
  let ctx =canvas.getContext("2d"); 
  let size = 20;
  let score = document.querySelector(".score > span");
  return {canvas,ctx,size,score};
}

