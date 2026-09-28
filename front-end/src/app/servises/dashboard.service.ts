import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable, NgZone } from '@angular/core';
import { BehaviorSubject, Observable } from 'rxjs';
@Injectable({
  providedIn: 'root',
})
export class DashboardService {
  private tokenSubject = new BehaviorSubject<string | null>(this.getToken());
  token$ = this.tokenSubject.asObservable();
  private apiUrl = 'http://127.0.0.1:8000/api/';

  constructor(private http: HttpClient, private zone: NgZone) {
    this.listenToTokenChanges();
  }

  getAlldashboard(): Observable<any> {
    const token = this.tokenSubject.value;

    // Set headers with token if available
    const headers = new HttpHeaders({
      Authorization: `Bearer ${token}`,
    });

    return this.http.get(this.apiUrl + 'Dashboard', { headers });
  }

  private getToken(): string | null {
    return localStorage.getItem('token');
  }

  private listenToTokenChanges(): void {
    window.addEventListener('storage', (event) => {
      if (event.key === 'token') {
        this.zone.run(() => {
          const updatedToken = this.getToken();
          this.tokenSubject.next(updatedToken);
        });
      }
    });
  }

  setToken(token: string): void {
    localStorage.setItem('token', token);
    this.tokenSubject.next(token);
  }

  removeToken(): void {
    localStorage.removeItem('token');
    this.tokenSubject.next(null);
  }
}
