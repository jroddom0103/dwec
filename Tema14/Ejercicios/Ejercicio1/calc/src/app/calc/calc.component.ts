import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-calc',
  standalone: false,
  templateUrl: './calc.component.html',
  styleUrl: './calc.component.css'
})
export class CalcComponent implements OnInit{
  public num1: number=0;
  public num2: number=0;
  public resultado: number=0;

  constructor(){}

  ngOnInit(): void{
    
  }

  public suma(){
    this.resultado = this.num1 + this.num2;
  }
}
