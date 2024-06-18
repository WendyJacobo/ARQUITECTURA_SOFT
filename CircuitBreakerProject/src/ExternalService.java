public class ExternalService {
    private CircuitBreaker circuitBreaker;

    public ExternalService(CircuitBreaker circuitBreaker) {
        this.circuitBreaker = circuitBreaker;
    }

    public String performRequest() {
        if (circuitBreaker.allowRequest()) {
            try {
                // Simulate a request to the external service
                if (shouldFail()) {
                    circuitBreaker.requestFailed();
                    throw new RuntimeException("Service unavailable");
                } else {
                    circuitBreaker.requestSucceeded();
                    return "Response from external service";
                }
            } catch (Exception ex) {
                circuitBreaker.requestFailed();
                throw ex;
            }
        } else {
            return "Fallback response";
        }
    }

    private boolean shouldFail() {
        // Simulate conditions that cause failures
        return Math.random() < 0.3; // 30% chance of failure
    }
}

