import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CreateCompgianComponent } from './create-compgian.component';

describe('CreateCompgianComponent', () => {
  let component: CreateCompgianComponent;
  let fixture: ComponentFixture<CreateCompgianComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [CreateCompgianComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(CreateCompgianComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
