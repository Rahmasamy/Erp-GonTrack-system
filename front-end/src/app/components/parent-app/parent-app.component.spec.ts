import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ParentAppComponent } from './parent-app.component';

describe('ParentAppComponent', () => {
  let component: ParentAppComponent;
  let fixture: ComponentFixture<ParentAppComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ParentAppComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(ParentAppComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
