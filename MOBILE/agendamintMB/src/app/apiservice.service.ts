import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
@Injectable({
  providedIn: 'root'
})
export class ApiserviceService {
  headers : HttpHeaders;
  serve : string = "http://localhost/agendamint3/api/";
  constructor(
    private http: HttpClient
  ) {
    var headers = new Headers();
    headers.append('Access-Control-Allow-Origin' , '*');
    headers.append('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT');
    headers.append('Accept','application/json');
    headers.append('Content-type','application/json');
  }

    doLogin(user, senha){
      return this.http.get(this.serve+'usuarios/login/'+user+'/'+senha);
    }

    horariosByCliente(idCliente){
      return this.http.get(this.serve+'agendamentos/getByCliente/'+idCliente);
    }

    solicitarAgendamento(idFuncionario:string, idUsuario:string, servico:string, horario:string){
      return this.http.get(this.serve+'agendamentos/agendar/'+idFuncionario+"/"+idUsuario+"/"+horario+"/"+servico+"/");
    }

    getFuncionariosByCompany(idCompany:string){
      return this.http.get(this.serve+'funcionarios/getByCompany/'+idCompany);
    }
    
}
