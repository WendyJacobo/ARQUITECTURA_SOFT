public class CircuitBreakerPattern {
    public static void main(String[] args) {
        CircuitBreaker circuitBreaker = new CircuitBreaker(3, 5000); // Allow 3 consecutive failures before opening for 5 seconds
        ExternalService externalService = new ExternalService(circuitBreaker);

        for (int i = 0; i < 10; i++) {
            try {
                String response = externalService.performRequest();
                System.out.println("Response: " + response);
            } catch (Exception ex) {
                System.out.println("Exception: " + ex.getMessage());
            }
        }
    }
}
