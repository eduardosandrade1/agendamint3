import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ApiserviceService } from '../apiservice.service';
// import 'rxjs/add/operator/map';

@Component({
  selector: 'app-agenda',
  templateUrl: './agenda.page.html',
  styleUrls: ['./agenda.page.scss'],
})
export class AgendaPage implements OnInit {
  nome : string = JSON.parse(localStorage.getItem('dados'))[0]['nome'];

  constructor(
    private route : Router
  ) { }

  ngOnInit() {
  }

  logout(){
    localStorage.clear();
    this.route.navigate(['/home']);
  }

  listaHorarios(){
    this.route.navigate(['/horarios']);
  }
}
