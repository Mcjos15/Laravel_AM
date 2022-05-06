import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class ElementosServiceService {
  private baseURL: string = environment.baseURL;

  constructor(private http: HttpClient) { }

  getHeroes(): Observable<any[]> {
    return this.http.get<any>(`${this.baseURL}/heroe`);
  }
}
