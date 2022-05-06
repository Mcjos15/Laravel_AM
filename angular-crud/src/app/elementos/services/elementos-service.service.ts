import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment';
import { Elemento } from '../interfaces/elementos.interface';

@Injectable({
  providedIn: 'root'
})
export class ElementosServiceService {
  private baseURL: string = environment.baseURL;

  constructor(private http: HttpClient) { }

  getElementos(): Observable<any[]> {
    return this.http.get<any>(`${this.baseURL}/heroe`);
  }
  getElementosId(id: string): Observable<any> {
    return this.http.get<any>(`${this.baseURL}/heroe`);
  }

  ActualziarElemento(elemento: Elemento): Observable<Elemento> {
    return this.http.put<Elemento>(`${this.baseURL}/elemento/${elemento.id}`, elemento);
  }
}
