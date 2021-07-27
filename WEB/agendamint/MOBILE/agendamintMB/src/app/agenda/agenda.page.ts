import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
// import 'rxjs/add/operator/map';

@Component({
  selector: 'app-agenda',
  templateUrl: './agenda.page.html',
  styleUrls: ['./agenda.page.scss'],
})
export class AgendaPage implements OnInit {
  nome : string = "";

  constructor(
    private route : Router
  ) { }

  ngOnInit() {
    this.nome = JSON.parse(localStorage.getItem('nome'));
  }

  logout(){
    localStorage.clear();
    this.route.navigate(['/home']);
  }

  listaHorarios(){
    this.route.navigate(['/horarios']);
  }
}
